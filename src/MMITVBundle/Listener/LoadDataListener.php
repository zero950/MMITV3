<?php
namespace AppBundle\Listener;

use AncaRebeca\FullCalendarBundle\Model\Event;

class LoadDataListener
{
    /**
     * @param CalendarEvent $calendarEvent
     *
     * @return EventInterface[]
     */
    public function loadData(CalendarEvent $calendarEvent)
    {
        $startDate = $calendarEvent->getStartDatetime();
        $endDate = $calendarEvent->getEndDatetime();
        $filters = $calendarEvent->getFilters();

        //You may want do a custom query to populate the events

    }
}