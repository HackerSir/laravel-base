<?php


namespace App\Traits;


use ReflectionClass;
use Spatie\Activitylog\Traits\LogsActivity;

trait LogModelEvent
{
    use LogsActivity {
        getLogNameToUse as originalGetLogNameToUse;
    }
    protected static $logName = 'loggable-model';
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $eventText = [
        'created' => '建立了',
        'updated' => '更新了',
        'deleted' => '刪除了',
    ];

    public function getDescriptionForEvent(string $eventName): string
    {
        return self::$eventText[$eventName] . ' ' . $this->getNameForActivityLog();
    }

    protected function getNameForActivityLog(): string
    {
        try {
            return (new ReflectionClass($this))->getShortName();
        } catch (\ReflectionException $e) {
            return '';
        }
    }

    public function getLogNameToUse(string $eventName = ''): string
    {
        $nameForActivityLog = $this->getNameForActivityLog();
        if (!empty($nameForActivityLog)) {
            return mb_strtolower($nameForActivityLog);
        }

        return $this->originalGetLogNameToUse($eventName);
    }
}
