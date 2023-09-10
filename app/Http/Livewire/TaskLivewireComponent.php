<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskLivewireComponent extends Component
{
    public $name;
    public $priority;
    public $valueId = null;

    public function create()
    {
        $validatedInput = $this->validate([
            'name' => 'required',
            'priority' => 'required|integer',
        ]);

        $this->save($this->valueId, $validatedInput);
        $this->reset();
    }

    public function edit($id)
    {
        $editValue = Task::find($id);
        $this->name = $editValue->name;
        $this->priority = $editValue->priority;
        $this->valueId =  $editValue->id;
    }

    public function delete($id)
    {
        Task::find($id)->delete();
    }

    public function dragAndDrop($items)
    {
        foreach ($items as $item) {
            Task::find($item['value'])->update(['priority' => $item['order']]);
        }
    }

    public function render()
    {
        return view('livewire.task-livewire-component', [
            'tasks' => Task::orderBy('priority', 'asc')->get()
        ]);
    }

    /**
     * saves or updates value in DB
     *
     * @param [int] $key
     * @param [array] $value
     * @return boolean
     */
    public function save($taskId = null, $value)
    {
        return Task::updateOrCreate(
            [
                'id' => $taskId
            ],
            $value
        );
    }
}
