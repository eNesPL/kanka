<?php

namespace App\View\Components\Buttons;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Confirm extends Component
{
    use Colours;

    public ?string $type;
    public bool $full;
    public bool $outline;
    public ?string $target;
    public ?string $name;
    public ?string $size;
    public ?string $dismiss;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $type = null,
        string $target = null,
        bool $full = false,
        bool $outline = false,
        string $name = null,
        string $size = null,
        string $dismiss = null,
    ) {
        $this->type = $type;
        $this->full = $full;
        $this->outline = $outline;
        $this->target = $target;
        $this->name = $name;
        $this->size = $size;
        $this->dismiss = $dismiss;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.buttons.confirm')
            ->with('colours', $this->colour())
            ->with('sizes', $this->size())
            ;
    }

    protected function size(): string
    {
        if ($this->size === 'sm') {
            return 'px-3 py-1 text-sm min-h-2';
        }
        return 'px-6 py-2.5 min-h-4';
    }
}
