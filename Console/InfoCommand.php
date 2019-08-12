<?php

namespace Pingu\Info\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class InfoCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'info';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Shows info about the site.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $slugs = [];
        foreach(\Infos::getProviderSlugs() as $slug){
            if($this->option($slug)) $slugs[] = $slug;
        }
        $infos = \Infos::getInfos($slugs);
        $this->printInfos($infos);
    }

    /**
     * Prints an info title
     * 
     * @param  string $title
     */
    protected function printTitle(string $title)
    {
        $this->info($title);
    }

    /**
     * Prints one line of info
     * 
     * @param  string $title
     * @param  string $info
     * @param  int    $spaces
     */
    protected function printLine(string $title, string $info, int $spaces)
    {
        echo str_repeat(' ', $spaces).$title.' : '.$info."\n";
    }

    /**
     * Print an array of info
     * 
     * @param  array       $infos
     * @param  int|integer $spaces
     */
    protected function printInfo(array $infos, int $spaces = 0)
    {
        foreach($infos as $name => $info){
            if(is_array($info)){
                $this->printInfo($info, $spaces + 4);
            }
            else{
                $this->printLine($name, $info, $spaces);
            }
        }
    }

    /**
     * Prints an array of infos for several providers
     * 
     * @param  array  $infos
     */
    protected function printInfos(array $infos)
    {
        foreach($infos as $info){
            $this->printTitle($info['title']);
            $this->printInfo($info['infos']);
        }
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        foreach(\Infos::getProviderSlugs() as $slug){
            $options[] = [$slug, null, InputOption::VALUE_NONE, '', null];
        }
        return $options;
    }
}
