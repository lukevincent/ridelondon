<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class RiderResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            'id' => $this->id,
            'ride_london_id' => $this->ride_london_id,
            'bib_number' => $this->bib_number,
            'est_start_time' => $this->est_start_time,
            'name' => $this->name,
            'age_group' => $this->age_group,
            'club' => $this->club,
            'event' => $this->event,
            'event_state' => $this->event_state,
            'last_split' => $this->last_split,
            'finish_time' => $this->finish_time,
            'title' => $this->title,
            'nationalality' => $this->nationalality,
            'flagged' => $this->flagged,
            'splits' => $this->splits,
        ];
    }
}
