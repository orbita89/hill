<?php
//
//class ContollerConfiguration
//{
//    private string $name;
//    private string $action;
//
//    public function __construct(string $name, string $action)
//    {
//        $this->name = $name;
//        $this->action = $action;
//    }
//
//    /**
//     * @return string
//     */
//    public function getName(): string
//    {
//        return $this->name;
//    }
//
//    /**
//     * @param  string  $name
//     */
//    public function setName(string $name): void
//    {
//        $this->name = $name;
//    }
//
//    /**
//     * @return string
//     */
//    public function getAction(): string
//    {
//        return $this->action;
//    }
//
//    /**
//     * @param  string  $action
//     */
//    public function setAction(string $action): void
//    {
//        $this->action = $action;
//    }
//
//}
//
//class Controller
//{
//    private ContollerConfiguration $configurationConfiguration;
//
//    public function __construct(ContollerConfiguration $configurationConfiguration)
//    {
//        $this->configurationConfiguration = $configurationConfiguration;
//    }
//
//
//    public function getConfigurationConfiguration(): string
//    {
//        return $this->configurationConfiguration->getName() . '@' . $this->configurationConfiguration->getAction();
//    }
//}
//
//$configuration = new ContollerConfiguration('controller','index');
//
//$controller = new Controller($configuration);
//var_dump($controller->getConfigurationConfiguration());