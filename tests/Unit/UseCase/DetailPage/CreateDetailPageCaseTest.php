<?php

namespace Tests\Unit\UseCase\DetailPage;

use App\Http\UseCase\DetailPage\CreateDetailPageCase;
use App\Model\Message;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreateDetailPageCaseTest extends TestCase
{
    use DatabaseMigrations;

    public function testRegister()
    {

        $createDetailPageCase = new CreateDetailPageCase();
        $createResult = $createDetailPageCase->__invoke(1, 'UserNameHoge', 'MessagePiyo');

        $message = Message::where('id', 1)->first();

        $this->assertTrue($createResult);
        $this->assertEquals('UserNameHoge', $message->user_name);
        $this->assertEquals('MessagePiyo', $message->message);
    }
}
