<?php

namespace Tests\Feature;

use App\Ticket;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateTicketTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_may_not_create_tickets()
    {
        $ticket = make(Ticket::class);

        $this->post('/tickets', $ticket->toArray())
            ->assertLocation('/login');
    }

    /** @test */
    public function authenticated_user_may_create_tickets()
    {
        // Given we have a signed in user
        $this->signIn();

        // When we hit the endpoint to create a new ticket
        $ticket = make(Ticket::class);

        $response = $this->post('/tickets', $ticket->toArray());

        // Then, when we vist the ticket page
        $response = $this->get('/tickets');

        // We should see the new ticket
        $response->assertSee($ticket->title);
    }
}
