<?php

namespace Tests\Feature;

use App\Events\UserRegistered;
use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class UserRegistrationEventTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that the UserRegistered event is dispatched when a user registers.
     */
    public function test_user_registered_event_is_dispatched(): void
    {
        Event::fake([UserRegistered::class]);

        $this->post('/register', [
            'name' => 'Event User',
            'email' => 'event@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        Event::assertDispatched(UserRegistered::class, function ($event) {
            return $event->user->email === 'event@example.com';
        });
    }

    /**
     * Test that the SendWelcomeEmail listener sends a welcome email.
     */
    public function test_welcome_email_is_sent_when_event_is_fired(): void
    {
        Mail::fake();

        $user = User::factory()->create([
            'email' => 'welcome@example.com'
        ]);

        // Trigger the event manually to see if the listener (which is registered in AppServiceProvider) responds
        event(new UserRegistered($user));

        // Note: Since SendWelcomeEmail implements ShouldQueue, it will be pushed to the queue.
        // Mail::fake() captures emails even if they are sent from within a queued listener in a test environment.
        Mail::assertSent(WelcomeEmail::class, function ($mail) use ($user) {
            return $mail->hasTo($user->email) &&
                $mail->user->id === $user->id;
        });
    }

    /**
     * Test the premium mailable content.
     */
    public function test_welcome_email_content(): void
    {
        $user = User::factory()->make([
            'name' => 'John Doe'
        ]);

        $mailable = new WelcomeEmail($user);

        $mailable->assertHasSubject('Welcome to our platform!');
        $mailable->assertSeeInHtml('Welcome, John Doe!');
        $mailable->assertSeeInHtml('Get Started Now');
    }
}
