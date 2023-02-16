<?php

namespace App\Infrastructure\DQL;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\Parser;
use Doctrine\ORM\Query\SqlWalker;
use Doctrine\ORM\Query\Lexer;
use Doctrine\ORM\Query\AST\ComparisonExpression;

class Geolocation extends FunctionNode
{
    private ComparisonExpression $latitude;
    private ComparisonExpression $longitude;

    public function parse(Parser $parser)
    {
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);
        $this->latitude = $parser->ComparisonExpression();
        $parser->match(Lexer::T_COMMA);
        $this->longitude = $parser->ComparisonExpression();
        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }

    public function getSql(SqlWalker $sqlWalker):string
    {
        return sprintf(
            '((ACOS(SIN(CAST(%s AS NUMERIC) * PI() / 180) * SIN(CAST(%s AS NUMERIC) * PI() / 180) + COS(CAST(%s AS NUMERIC) * PI() / 180) * COS(CAST(%s AS NUMERIC) * PI() / 180) * COS((CAST(%s AS NUMERIC) - CAST(%s AS NUMERIC)) * PI() / 180)) * 180 / PI()) * 60 * CAST(%s AS NUMERIC))',
            $this->latitude->rightExpression->dispatch($sqlWalker),
            $this->latitude->leftExpression->dispatch($sqlWalker),
            $this->latitude->rightExpression->dispatch($sqlWalker),
            $this->latitude->leftExpression->dispatch($sqlWalker),
            $this->longitude->rightExpression->dispatch($sqlWalker),
            $this->longitude->leftExpression->dispatch($sqlWalker),
            '1.1515 * 1.609344'
        );
    }
}
