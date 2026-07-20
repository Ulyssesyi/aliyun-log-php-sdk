<?php

declare(strict_types=1);

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$rules = [
    '@PSR12' => true,
    '@PSR12:risky' => true,
    '@PHP80Migration' => true,
    '@PHP80Migration:risky' => true,
    '@PHP81Migration' => true,

    // Array notation
    'array_syntax' => ['syntax' => 'short'],

    // Braces and formatting
    'braces_position' => [
        'classes_opening_brace' => 'same_line',
        'functions_opening_brace' => 'same_line',
    ],
    'single_blank_line_at_eof' => true,
    'blank_line_after_namespace' => true,
    'blank_line_after_opening_tag' => false,
    'no_blank_lines_after_class_opening' => true,

    // Imports
    'single_import_per_statement' => true,
    'no_unused_imports' => true,
    'ordered_imports' => ['sort_algorithm' => 'alpha'],
    'global_namespace_import' => [
        'import_classes' => null,
        'import_constants' => null,
        'import_functions' => null,
    ],

    // Casting, operators
    'cast_spaces' => ['space' => 'single'],
    'combine_consecutive_unsets' => true,

    // Control structure
    'include' => true,
    'no_extra_blank_lines' => [
        'tokens' => [
            'extra',
            'throw',
            'use',
        ],
    ],
    'no_spaces_around_offset' => ['positions' => ['inside', 'outside']],
    'no_trailing_comma_in_list_call' => true,
    'no_trailing_comma_in_singleline_array' => true,
    'no_whitespace_before_comma_in_array' => true,
    'normalize_index_brace' => true,
    'trailing_comma_in_multiline' => ['elements' => ['arrays', 'arguments', 'parameters']],
    'trim_array_spaces' => true,

    // Function and method
    'function_typehint_space' => true,
    'native_function_casing' => true,
    'no_alias_functions' => true,
    'no_trailing_whitespace_in_comment' => true,
    'return_type_declaration' => ['space_before' => 'none'],

    // Whitespace
    'no_spaces_inside_parenthesis' => true,
    'no_trailing_whitespace' => true,
    'no_whitespace_in_blank_line' => true,
    'blank_line_between_import_groups' => false,
    'method_argument_space' => [
        'on_multiline' => 'ensure_fully_multiline',
    ],

    // Strings
    'single_quote' => true,

    // Strict (only for new code, not existing)
    'declare_strict_types' => false,

    // PHP 8.0+
    'operator_linebreak' => [
        'only_booleans' => true,
        'position' => 'beginning',
    ],
];

$finder = Finder::create()
    ->in([
        __DIR__ . '/Aliyun',
        __DIR__ . '/tests',
        __DIR__ . '/sample',
    ])
    ->name('*.php')
    ->notPath('#/docs/#')
    ->notPath('#/vendor/#')
    ->notName('*.blade.php')
    ->notName('_ide_helper.php');

return (new Config())
    ->setFinder($finder)
    ->setRules($rules)
    ->setRiskyAllowed(true)
    ->setUsingCache(true)
    ->setParallelConfig(PhpCsFixer\Runner\Parallel\ParallelConfigFactory::detect());
