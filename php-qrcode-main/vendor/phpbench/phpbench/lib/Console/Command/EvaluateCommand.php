<?php

namespace PhpBench\Console\Command;

use PhpBench\Expression\Evaluator;
use PhpBench\Expression\Lexer;
use PhpBench\Expression\Parser;
use PhpBench\Expression\Printer;
use PhpBench\Expression\Printer\EvaluatingPrinter;
use RuntimeException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use function json_last_error_msg;

class EvaluateCommand extends Command
{
    final public const ARG_EXPR = 'expr';
    final public const ARG_PARAMS = 'params';

    public function __construct(
        private readonly Evaluator $evaluator,
        private readonly Lexer $lexer,
        private readonly Parser $parser,
        private readonly Printer $printer,
        private readonly EvaluatingPrinter $evalPrinter,
        private readonly OutputInterface $stdout
    ) {
        parent::__construct();
    }

    public function configure(): void
    {
        $this->setName('eval');
        $this->setDescription('Evaluate an expression with the PHPBench expression language');
        $this->addArgument(self::ARG_EXPR, InputArgument::REQUIRED);
        $this->addArgument(self::ARG_PARAMS, InputArgument::OPTIONAL, 'JSON encoded parameters');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $expr = $input->getArgument(self::ARG_EXPR);
        assert(is_string($expr));
        $params = $input->getArgument(self::ARG_PARAMS);
        assert(is_string($params) || is_null($params));

        $tokens = $this->lexer->lex($expr);
        $node = $this->parser->parse($tokens);
        $params = $this->resolveParams($params);
        $evaluated = $this->evaluator->evaluate($node, $params);
        $this->stdout->writeln(
            sprintf(
                "%s\n= %s\n= %s",
                $this->printer->print($node),
                $this->evalPrinter->withParams($params)->print($node),
                $this->printer->print($evaluated)
            )
        );

        return 0;
    }

    /**
     * @return array<string,mixed>
     */
    private function resolveParams(?string $params): array
    {
        if (null === $params) {
            return [];
        }

        if (null === $params = json_decode($params, true)) {
            throw new RuntimeException(sprintf(
                'Could not decode JSON: %s',
                json_last_error_msg()
            ));
        }

        return $params;
    }
}
