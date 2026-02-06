import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import heroAnimation from './hero';

Alpine.data('heroAnimation', heroAnimation);

Livewire.start();

