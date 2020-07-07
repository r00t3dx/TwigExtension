<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class TwigExtension extends AbstractExtension
{

    public function getFilters(): array {

        return [
            new TwigFilter('excerpt', [$this, 'excerpt']),
        ];
    }


    /**
     * @param string|null $content
     * @param int $characterLimit
     * @return string
     */
    public function excerpt(?string $content, int $characterLimit = 280): string
    {
        if ($content === null) {
            return '';
        }
        if (mb_strlen($content) <= $characterLimit) {
            return $content;
        }
        $lastSpace = strpos($content, ' ', $characterLimit);
        if ($lastSpace === false) {
            return $content;
        }
        return substr($content, 0, $lastSpace) . '...';
    }

}
