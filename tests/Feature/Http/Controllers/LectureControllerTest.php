<?php

namespace Tests\Feature\Http\Controllers;

use App\Lecture;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\LectureController
 */
class LectureControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $lectures = Lecture::factory()->count(3)->create();

        $response = $this->get(route('lecture.index'));

        $response->assertOk();
        $response->assertViewIs('lecture.index');
        $response->assertViewHas('classes');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\LectureController::class,
            'store',
            \App\Http\Requests\LectureStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $title = $this->faker->sentence(4);
        $description = $this->faker->text;

        $response = $this->post(route('lecture.store'), [
            'title' => $title,
            'description' => $description,
        ]);

        $lectures = Lecture::query()
            ->where('title', $title)
            ->where('description', $description)
            ->get();
        $this->assertCount(1, $lectures);
        $lecture = $lectures->first();

        $response->assertRedirect(route('lecture.index'));
        $response->assertSessionHas('lecture.title', $lecture->title);
    }
}
