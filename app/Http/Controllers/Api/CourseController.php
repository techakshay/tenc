<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /** Get Course Details
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCourseDetails(Request $request)
    {
        $user = $request->user();
       $course = Course::where('user_id',$user->id)->first();
        if($course)
        {
            return response()->json(['status' => 1, 'course' => $course], 200);
        }
        return response()->json(['status' => 0, 'message' => 'Course not found'], 404);
    }

    /** Change Course Status
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeStatus(Request $request)
    {
        $getCourse = Course::where('id',$request->course_id)->first();
        if($getCourse)
        {
            $getCourse->update(['status' => 2]);
            return response()->json(['status' => 1, 'course' => "Course Updated Successfully"], 200);
        }
        return response()->json(['status' => 0, 'course' => "Course Not Found"], 404);
    }
}
