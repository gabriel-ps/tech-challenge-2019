<?php

namespace Tests\Feature;

use App\Ticket;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadTicketTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_may_not_view_tickets()
    {
        $this->get('/tickets')
            ->assertLocation('/login');
    }

    /** @test */
    public function user_may_view_their_tickets()
    {
        $user = $this->signIn();
        $ticket = $this->createTicketForUser($user);

        $this->get('/tickets')
            ->assertSee($ticket->title);
    }

    /** @test */
    public function user_may_not_view_other_users_tickets()
    {
        $this->signIn();
        $ticket = create(Ticket::class);

        $this->get('/tickets')
            ->assertDontSee($ticket->title);
    }

    /** @test */
    public function user_may_view_a_single_ticket()
    {
        $user = $this->signIn();
        $ticket = $this->createTicketForUser($user);

        $this->get("/tickets/{$ticket->id}/edit")
            ->assertSee($ticket->title);
    }

    protected function createTicketForUser($user)
    {
        return create(Ticket::class, [
            'user_id' => $user->id
        ]);
    }
}
