<?php

interface FormatterInterface
{
    public function format(string $type): string;
}

interface DeliverInterface
{
    public function delivery(string $type): string;
}
class BaseFormatter
{
    public function getFormatter(string $name): ?object
    {
        $str = '';

        foreach (explode("_", $name) as $part) {
            $str .= icfirst($part);
        }

        if (!$str) {
            throw new Exception('Formatter name is empty');
        }

        return class_exists($str . 'Formatter' ) ? new ($str . 'Formatter') : null;
    }
}


class BaseDeliver
{
    public function getDeliver(string $name): ?object
    {
        $str = '';

        foreach (explode("_", $name) as $part) {
            $str .= icfirst($part);
        }

        if (!$str) {
            throw new Exception('Deliver name is empty');
        }

        return class_exists($str . 'Deliver' ) ? new ($str . 'Deliver') : null;
    }
}

class RawFormatter extends BaseFormatter implements FormatterInterface
{
     public function format(string $type): string
     {
         return $type;
     }
}

class WithDateFormatter extends BaseFormatter implements FormatterInterface
{
    public function format(string $type): string
    {
        return date('Y-m-d H:i:s') . $type;
    }
}

class WithDateAndDetailsFormatter extends BaseFormatter implements FormatterInterface
{
    public function format($type): string
    {
        return date('Y-m-d H:i:s') . $type . ' - With some details';
    }
}

class ByEmailDeliver extends  BaseDeliver implements DeliverInterface
{
    public function delivery(string $name): string
    {
        return "Вывод формата ({$name}) по имейл";
    }
}

class BySmsDeliver extends  BaseDeliver implements DeliverInterface
{
    public function delivery(string $name): string
    {
        return "Вывод формата ({$name}) в смс";
    }
}

class ToConsoleDeliver extends  BaseDeliver implements DeliverInterface
{
    public function delivery(string $name): string
    {
        return "Вывод формата ({$name}) в консоль";
    }
}



class Logger
{
    private $format;
    private $delivery;

    public function __construct($format, $delivery)
    {
        $this->format   = $format;
        $this->delivery = $delivery;
    }

    public function log($string): void
    {
        $baseFormatter = new BaseFormatter();
        $childFormatter = $baseFormatter->getFormatter($this->format);

        if (!$childFormatter) {
            die('Error format');
        }

        $baseDeliver = new BaseDeliver();
        $childDeliver = $baseDeliver->getDeliver($this->delivery);

        if (!$childDeliver) {
            die('Error deliver');
        }

        $result = $childFormatter->format($string);

        $childDeliver->delivery($result);
    }
}

$logger = new Logger('raw', 'by_sms');
$logger->log('Emergency error! Please fix me!');