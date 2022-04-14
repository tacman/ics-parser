<?php

declare(strict_types=1);

use Rector\Core\Configuration\Option;
use Rector\Core\ValueObject\PhpVersion;
use Rector\Laravel\Set\LaravelSetList;
use Rector\Php53\Rector\Ternary\TernaryToElvisRector;
use Rector\Set\ValueObject\SetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Rector\PHPUnit\Set\PHPUnitSetList;
// rector process src

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->import(PHPUnitSetList::PHPUNIT_90);

    $parameters = $containerConfigurator->parameters();



    $parameters->set(Option::IMPORT_SHORT_CLASSES, false);

    $parameters->set(Option::PHP_VERSION_FEATURES, PhpVersion::PHP_74);

    $parameters->set(Option::AUTOLOAD_PATHS, array(__DIR__ . '/vendor/autoload.php'));

    $parameters->set(Option::SKIP, array(
        // Rectors
        Rector\CodeQuality\Rector\Class_\CompleteDynamicPropertiesRector::class,
        Rector\CodeQuality\Rector\Concat\JoinStringConcatRector::class,
        Rector\CodeQuality\Rector\FuncCall\ChangeArrayPushToArrayAssignRector::class,
        Rector\CodeQuality\Rector\FuncCall\CompactToVariablesRector::class,
        Rector\CodeQuality\Rector\FuncCall\IntvalToTypeCastRector::class,
        Rector\CodeQuality\Rector\Identical\BooleanNotIdenticalToNotIdenticalRector::class,
        Rector\CodeQuality\Rector\Identical\SimplifyBoolIdenticalTrueRector::class,
        Rector\CodeQuality\Rector\If_\CombineIfRector::class,
        Rector\CodeQuality\Rector\If_\ExplicitBoolCompareRector::class,
        Rector\CodeQuality\Rector\If_\SimplifyIfElseToTernaryRector::class,
        Rector\CodeQuality\Rector\If_\SimplifyIfReturnBoolRector::class,
        Rector\CodeQuality\Rector\Isset_\IssetOnPropertyObjectToPropertyExistsRector::class,
        Rector\CodeQuality\Rector\PropertyFetch\ExplicitMethodCallOverMagicGetSetRector::class,
        Rector\CodeQuality\Rector\Return_\SimplifyUselessVariableRector::class,
        Rector\CodingStyle\Rector\ClassConst\VarConstantCommentRector::class,
        Rector\CodingStyle\Rector\Encapsed\EncapsedStringsToSprintfRector::class,
        Rector\CodingStyle\Rector\FuncCall\ConsistentPregDelimiterRector::class,
        Rector\CodingStyle\Rector\String_\SymplifyQuoteEscapeRector::class,
        Rector\DeadCode\Rector\Assign\RemoveUnusedVariableAssignRector::class,
        Rector\Php70\Rector\FuncCall\NonVariableToVariableOnFunctionCallRector::class,
        Rector\Php70\Rector\MethodCall\ThisCallOnStaticMethodToStaticCallRector::class,
        Rector\Php70\Rector\StaticCall\StaticCallOnNonStaticToInstanceCallRector::class,
        Rector\Php71\Rector\FuncCall\CountOnNullRector::class,
        Rector\Php73\Rector\FuncCall\JsonThrowOnErrorRector::class,
        Rector\Php74\Rector\Closure\ClosureToArrowFunctionRector::class,
        Rector\Php74\Rector\Property\TypedPropertyRector::class,
        Rector\TypeDeclaration\Rector\FunctionLike\ParamTypeDeclarationRector::class,
        Rector\CodingStyle\Rector\ClassMethod\UnSpreadOperatorRector::class,
        Rector\CodingStyle\Rector\PostInc\PostIncDecToPreIncDecRector::class,
        Rector\DeadCode\Rector\ClassMethod\RemoveUselessParamTagRector::class,
        Rector\DeadCode\Rector\ClassMethod\RemoveUnusedPromotedPropertyRector::class,
        Rector\CodeQuality\Rector\ClassMethod\DateTimeToDateTimeInterfaceRector::class,
        Rector\CodingStyle\Rector\Stmt\NewlineAfterStatementRector::class,
        Rector\DeadCode\Rector\StaticCall\RemoveParentCallWithoutParentRector::class,
        Rector\Transform\Rector\String_\StringToClassConstantRector::class,
        // PHP 5.6 incompatible
        Rector\CodeQuality\Rector\Ternary\ArrayKeyExistsTernaryThenValueToCoalescingRector::class, // PHP 7
        Rector\Php70\Rector\If_\IfToSpaceshipRector::class,
        Rector\Php70\Rector\Ternary\TernaryToSpaceshipRector::class,
        Rector\Php71\Rector\BooleanOr\IsIterableRector::class,
        Rector\Php71\Rector\List_\ListToArrayDestructRector::class,
        Rector\Php71\Rector\TryCatch\MultiExceptionCatchRector::class,
        Rector\Php73\Rector\FuncCall\ArrayKeyFirstLastRector::class,
        Rector\Php73\Rector\BooleanOr\IsCountableRector::class,
        Rector\Php74\Rector\Assign\NullCoalescingOperatorRector::class,
        Rector\Php74\Rector\FuncCall\ArraySpreadInsteadOfArrayMergeRector::class,
        Rector\Php74\Rector\LNumber\AddLiteralSeparatorToNumberRector::class,
        Rector\Php74\Rector\MethodCall\ChangeReflectionTypeToStringToGetNameRector::class,
        Rector\Php74\Rector\StaticCall\ExportToReflectionFunctionRector::class,
        Rector\CodingStyle\Rector\ClassConst\RemoveFinalFromConstRector::class, // PHP 8
    ));

    $containerConfigurator->import(SetList::CODE_QUALITY);
    $containerConfigurator->import(SetList::CODING_STYLE);
    $containerConfigurator->import(SetList::DEAD_CODE);
    $containerConfigurator->import(LaravelSetList::LARAVEL_50);
    $containerConfigurator->import(LaravelSetList::LARAVEL_51);
    $containerConfigurator->import(LaravelSetList::LARAVEL_52);
    $containerConfigurator->import(LaravelSetList::LARAVEL_53);
    $containerConfigurator->import(LaravelSetList::LARAVEL_54);
    $containerConfigurator->import(SetList::PHP_70);
    $containerConfigurator->import(SetList::PHP_71);
    $containerConfigurator->import(SetList::PHP_72);
    $containerConfigurator->import(SetList::PHP_73);
    $containerConfigurator->import(SetList::PHP_74);

    $services = $containerConfigurator->services();

    $services->set(TernaryToElvisRector::class);
};
