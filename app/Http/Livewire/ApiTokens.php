<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ApiTokens extends Component
{
    public $name;
    public $token;

    public function render()
    {
        return view('livewire.api-tokens');
    }

    public function deleteApiToken($id)
    {
        $user = auth()->user();
        $user->tokens()->where('id', $id)->delete();
    }

    public function createApiToken()
    {
        $this->validate([
            'name' => 'required|min:3|max:255',
        ]);

        $user = auth()->user();
        $this->token = $user->createToken($this->name, ['server:update'])->plainTextToken;
    }
}
