<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class MyEnvSetCommand extends MyEnvCommand
{
    protected $name = "myEnv:set";

    protected $description = "Adds host to environment.";

    public function fire()
    {
        $host        = $this->getHost();
        $config      = $this->getConfig();
        $overwrite   = $this->option("host");
        $environment = $this->argument("environment");

        if (!isset($config[$environment]))
        {
            $config[$environment] = [];
        }

        $use = $host;

        if ($overwrite)
        {
            $use = $overwrite;
        }



        if (!in_array($use, $config[$environment]))
        {
            $config[$environment][] = $use;

        }

        $this->setConfig($config);

        $this->line(trim("
            <info>Added</info>
            <comment>" . $use . "</comment>
            <info>to</info>
            <comment>" . $environment . "</comment>
            <info>environment.</info>
        "));
    }

    protected function getArguments()
    {
        return [
            [
                "environment",
                InputArgument::REQUIRED,
                "Environment to add the host to."
            ]
        ];
    }

    protected function getOptions()
    {
        return [
            [
                "host",
                null,
                InputOption::VALUE_OPTIONAL,
                "Host to add.",
                null
            ]
        ];
    }
 }