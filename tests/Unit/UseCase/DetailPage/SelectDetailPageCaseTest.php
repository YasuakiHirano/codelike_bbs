<?php

namespace Tests\Unit\UseCase\DetailPage;

use App\Http\UseCase\DetailPage\CreateDetailPageCase;
use App\Http\UseCase\DetailPage\SelectDetailPageCase;
use App\Http\UseCase\MakeBoard\CreateMakeBoardCase;
use App\Model\Message;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class SelectDetailPageCaseTest extends TestCase
{
    use DatabaseMigrations;

    public function testSelect()
    {
        $createMakeBoardCase = new CreateMakeBoardCase();
        $createResult = $createMakeBoardCase->__invoke('boardTitleTest', 'boardUserNameTest', 'boardAboutTextTest', 'boardPasswordTest');
        $this->assertTrue($createResult);

        $createDetailPageCase = new CreateDetailPageCase();
        $createResult = $createDetailPageCase->__invoke(1, 'UserNameHoge', 'MessagePiyo');
        $this->assertTrue($createResult);

        $selectDetailPageCase = new SelectDetailPageCase();
        $selectResult = $selectDetailPageCase->__invoke(1);

        $board = $selectResult[0];
        $this->assertEquals('boardTitleTest', $board->title);
        $this->assertEquals('boardUserNameTest', $board->user_name);
        $this->assertEquals('boardAboutTextTest', $board->about_text);
        $this->assertEquals('boardPasswordTest', $board->password);

        $message = $selectResult[1];
        $this->assertEquals('UserNameHoge', $message[0]->user_name);
        $this->assertEquals('MessagePiyo', $message[0]->message);
    }
}
