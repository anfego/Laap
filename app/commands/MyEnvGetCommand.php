<?php

use Illuminate\Console\Command;

class MyEnvGetCommand extends MyEnvCommand {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'myEnv:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Environment Commands';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
          $this->line(trim("
            <comment>Host:</comment>
            <info>" . $this->getHost() . "</info>
        "));

        $this->line(trim("
            <comment>Environment:</comment>
            <info>" . $this->getEnvironment() . "</info>
        "));
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [];
    }

}
