<?php
declare(strict_types=1);

namespace Marquage\ParsedownAnchors;

use PHPUnit\Framework\TestCase;

class ParsedownSlugifiedTest extends TestCase
{
    /**
     * Test
     */
    public function testSlugs()
    {
        $parser = new ParsedownSlugified();
        $file = file_get_contents('tests/MarkdownTest.md');
        $test = $parser->parse($file);
        $this->assertSame(
            '<h2 id="the-site">The Site</h2>
<h2 id="the-site-1">The Site</h2>',
            trim($test)
        );
    }
}
