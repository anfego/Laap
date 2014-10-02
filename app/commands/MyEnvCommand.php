<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class MyEnvCommand extends Command {

  /**
   * The console command name.
   *
   * @var string
   */
  protected $name = 'myEnv';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'List Environment Commands';

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return mixed
   */
  public function fire()
  {
     $this->line(trim("
             <comment>environment:get</comment>
             <info>gets host and environment.</info>
         "));

         $this->line(trim("
             <comment>environment:set</comment>
             <info>adds host to environment.</info>
         "));
 
         $this->line(trim("
             <comment>environment:remove</comment>
             <info>removes host from environment.</info>
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
   /**
   * Get host name
   *
   * @return array
   */
  protected function getHost()
  {
    return gethostname();
  }
   /**
   * Get working enviroment
   *
   * @return array
   */
  protected function getEnvironment()
  {
    return App::environment();
  }
  
  protected function getPath()
  {
      return app_path() . "/config/environment.php";
  }

  protected function getConfig()
  {
      $environments = require $this->getPath();

      if (!is_array($environments))
      {
          $environments = [];
      }
      return $environments;
  }

  protected function setConfig($config)
  {
    $code = "<?php\n\nreturn [";
    foreach ($config as $environment => $hosts)
    {
        
        $code .= "\n  \"" . $environment . "\" => [";
        foreach ($hosts as $host)
        {
            $code .= "\n    \"" . $host . "\",";
        }
        $code = trim($code, ",");
        $code .= "\n  ],";
    }
    $code = trim($code, ",");
    File::put($this->getPath(), $code . "\n];");
  }
}

