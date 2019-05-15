<?php

namespace Marquage\ParsedownAnchors;

use ParsedownExtra;
use Exception;
use Cocur\Slugify\Slugify;

class ParsedownSlugified extends ParsedownExtra
{
    private $used = [];

    /**
     * ParsedownExtended constructor.
     */
    public function __construct()
    {
        try {
            parent::__construct();
        } catch (Exception $e) {
        }
    }

    /**
     * Overrides both Parsedown & Parsedown-extra to capture parsed headers, add a unique slug-id to each for the output
     * @param $Line
     * @return array|void
     */
    protected function blockHeader($Line)
    {
        $Block = [];
        if (isset($Line['text'][1])) {
            $level = 1;

            while (isset($Line['text'][$level]) and $Line['text'][$level] === '#') {
                if ($level < 7) {
                    $level++;
                }
            }
            $text = trim($Line['text'], '# ');

            $Block = array(
                'element' => [
                    'name' => 'h' . min(6, $level),
                    'text' => $text,
                    'handler' => 'line',
                    'attributes' => [
                        'id' => $this->slugify($text)
                    ]
                ],
            );
        }
        if (preg_match(
            '/[ #]*{(' . $this->regexAttribute . '+)}[ ]*$/',
            $Block['element']['text'],
            $matches,
            PREG_OFFSET_CAPTURE
        )) {
            $attributeString = $matches[1][0];
            $Block['element']['attributes'] = $this->parseAttributeData($attributeString);
            $Block['element']['text'] = substr($Block['element']['text'], 0, $matches[0][1]);
        }
        return $Block;
    }

    /**
     * Uses Cocur to slugify but ensures each slug is unique
     * credit: https://github.com/caseyamcl/toc
     * @param $text
     * @return string
     */
    protected function slugify($text)
    {
        $slugger = new Slugify();
        $slugged = $slugger->slugify($text);
        $count = 1;
        $orig = $slugged;
        while (in_array($slugged, $this->used)) {
            $slugged = $orig . '-' . $count;
            $count++;
        }
        $this->used[] = $slugged;
        return $slugged;
    }
}
