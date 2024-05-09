<?php
//
//interface Mail
//{
//    public function render();
//}
//
//abstract class TypeMail
//{
//    private string $text;
//
//    /**
//     * @param  string  $text
//     */
//    public function __construct(string $text)
//    {
//        $this->text = $text;
//    }
//
//    /**
//     * @return string
//     */
//    public function getText(): string
//    {
//        return $this->text;
//    }
//
//}
//
//class BusinessMail extends TypeMail implements Mail
//{
//
//    public function render(): string
//    {
//        return $this->getText().'from business';
//    }
//}
//
//
//class JobMail extends TypeMail implements Mail
//{
//
//    public function render(): string
//    {
//        return $this->getText().'from JobMail';
//    }
//}
//
//class MailFactory
//{
//    private array $pool = array();
//
//    /**
//     * @return array
//     * @todo таким способом не даем без расходное создание объектов
//     */
//    public function getMail($id, $typeMail): Mail
//    {
//        if (!isset($this->pool[$id])) {
//            $this->pool[$id] = $this->make($typeMail);
//        }
//        return $this->pool[$id];
//    }
//
//    private function make($typeMail): Mail
//    {
//        if ($typeMail === 'business') {
//            return new BusinessMail('Business text');
//        }
//        return new JobMail('Job text');
//    }
//}
//
//$mailFactory = new MailFactory();
//$mail = $mailFactory->getMail(10 , 'asdasd');
//
//var_dump($mail->render());
//
////TODO: СМЫСЛ ЖАБЛОНА ИСКЛЮЧИТЬ НЕ НУЖНЫЕ ОБЪЕКТЫ