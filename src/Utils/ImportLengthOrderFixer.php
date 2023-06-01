<?php

namespace QRFeedz\Services\Utils;

use PhpCsFixer\Fixer\FixerInterface;
use PhpCsFixer\FixerDefinition\FixerDefinition;
use PhpCsFixer\FixerDefinition\FixerDefinitionInterface;
use PhpCsFixer\Tokenizer\Tokens;
use SplFileInfo;

class ImportLengthOrderFixer implements FixerInterface
{
    /**
     * {@inheritdoc}
     */
    public function getName(): string
    {
        return 'QRFeedz/import_length_order';
    }

    /**
     * {@inheritdoc}
     */
    public function isCandidate(Tokens $tokens): bool
    {
        return $tokens->isTokenKindFound(T_USE);
    }

    /**
     * {@inheritdoc}
     */
    public function isRisky(): bool
    {
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function fix(SplFileInfo $file, Tokens $tokens): void
    {
        $imports = [];
        $index = 0;

        while (($index = $tokens->getNextTokenOfKind($index, [T_USE])) !== null) {
            $endIndex = $tokens->getNextTokenOfKind($index, [';']);
            $importTokens = $tokens->generatePartialCode($index + 2, $endIndex - 1);

            $imports[] = [
                'index' => $index,
                'endIndex' => $endIndex,
                'code' => $importTokens,
            ];

            $index = $endIndex;
        }

        if (empty($imports)) {
            return;
        }

        usort($imports, function ($a, $b) {
            return strlen($a['code']) - strlen($b['code']);
        });

        $sortedUseStatementsCode = implode(PHP_EOL, array_map(function ($import) {
            return 'use '.$import['code'].';';
        }, $imports));

        $firstImportIndex = $imports[0]['index'];
        $lastImportEndIndex = $imports[count($imports) - 1]['endIndex'];

        $tokens->overrideRange($firstImportIndex, $lastImportEndIndex, [new Token('<?php '.$sortedUseStatementsCode)]);
    }

    /**
     * {@inheritdoc}
     */
    public function getDefinition(): FixerDefinitionInterface
    {
        return new FixerDefinition('Order use statements by length.', []);
    }

    /**
     * {@inheritdoc}
     */
    public function getPriority(): int
    {
        // should be run after the UnusedUseFixer
        return -10;
    }

    /**
     * {@inheritdoc}
     */
    public function supports(SplFileInfo $file): bool
    {
        return true;
    }
}
