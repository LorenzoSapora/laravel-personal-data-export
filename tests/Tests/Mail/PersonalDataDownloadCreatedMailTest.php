<?php

namespace Spatie\PersonalDataExport\Tests\Tests\Mail;

use Spatie\PersonalDataExport\Notifications\PersonalDataExported;
use Spatie\PersonalDataExport\Tests\TestCase;

class PersonalDataDownloadCreatedMailTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Notification::fake();
    }

    /** @test */
    public function the_personal_data_download_created_mail_can_be_rendered_to_a_string()
    {
    	$user = factory(User::class)->create();

        $zipFilename = 'personal-data.zip';

        $renderedNotification = (new PersonalDataExported($zipFilename))->toMail($user);

        $this->assertTrue(is_string($renderedNotification));
    }
}
