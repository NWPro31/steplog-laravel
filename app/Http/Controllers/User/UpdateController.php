<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UpdateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Show the application dashboard.
     *
     * @return JsonResponse
     */
    public function __invoke(UpdateRequest $request)
    {
        $data = $request->validated();
        $user = User::find(auth()->user()->getAuthIdentifier());

        if($data["image"] !== null)
        {
            $imageName = hash('sha256', auth()->user()->getAuthIdentifier().time()).'.'.$data["image"]->extension();
            $data["image"]->storeAs('images', $imageName, 'public');
            $destinationPath = public_path('/thumbnail');
            $img = Image::make($data["image"]->path());
            $img->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imageName);
            $data["image_url"] = $imageName;
            if($user->image_url !== null){
                Storage::disk('public')->delete('images/'.$user->image_url);
                File::delete('thumbnail/'.$user->image_url);
            }
        }
        unset($data["image"]);
        $user->update($data);

        return response()->json([
            'success' => true,
            'user' => $user
        ], 200);
    }
}
