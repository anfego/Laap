<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class MyEnvRemoveCommand extends MyEnvCommand
{
    protected $name = "myEnv:remove";

    protected $description = "Removes host from environment.";

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

        foreach ($config[$environment] as $index => $item)
        {
            if ($item == $use)
            {
                unset($config[$environment][$index]);
            }
        }

        $this->setConfig($config);

        $this->line(trim("
            <info>Removed</info>
            <comment>" . $use . "</comment>
            <info>from</info>
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
                "Environment to remove the host from."
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
                "Host to remove.",
                null
            ]
        ];
    }
}
