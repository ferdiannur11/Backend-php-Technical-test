<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExpenseApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_expense_task()
    {
        $formData = [
            "amount"=> "8000",
        ];
       $this->post(route('expense.create'),$formData)
       ->assertStatus(201);
    }
    public function test_cannot_expense_task_with_invalid_data()
    {
        $formData = [];
        $this->post(route('expense.create'), $formData)
            ->assertStatus(422);

        $formData = [
            "amount" => "-8000",
        ];

        $this->post(route('expense.create'), $formData)
            ->assertStatus(422);

        $formData = [
            "amount" => "invalid",
        ];
        $this->post(route('expense.create'), $formData)
            ->assertStatus(422);
    }
    public function test_cannot_get_nonexistent_expense()
    {

        $response = $this->get(route('expense.get', ['id' => 999]));
        $response->assertStatus(422);
        $response->assertJson([
            'responseCode' => 422,
            'ResponseDesc' => 'Validation Error',
            'errors' => [
                'id' => ['ID expense tidak ada.']
            ]
        ]);
    }
    public function test_get_expense()
    {
        $response = $this->get(route('expense.get', ['id' => 3]));
        $response->assertStatus(200);
    }
}