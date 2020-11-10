<?php

namespace Tests\Feature\Http\Controllers;

use App\Lesson;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\LessonController
 */
class LessonControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $lessons = Lesson::factory()->count(3)->create();

        $response = $this->get(route('lesson.index'));

        $response->assertOk();
        $response->assertViewIs('lesson.index');
        $response->assertViewHas('lessons');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\LessonController::class,
            'store',
            \App\Http\Requests\LessonStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $title = $this->faker->sentence(4);
        $description = $this->faker->text;

        $response = $this->post(route('lesson.store'), [
            'title' => $title,
            'description' => $description,
        ]);

        $lessons = Lesson::query()
            ->where('title', $title)
            ->where('description', $description)
            ->get();
        $this->assertCount(1, $lessons);
        $lesson = $lessons->first();

        $response->assertRedirect(route('lesson.index'));
        $response->assertSessionHas('lesson.title', $lesson->title);
    }
}
