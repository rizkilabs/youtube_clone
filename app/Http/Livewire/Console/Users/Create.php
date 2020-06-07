<?php

namespace App\Http\Livewire\Console\Users;

use App\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class Create extends Component
{
    /**
     * public variable
     */
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $image;

    /**
     * listeners
     */
    protected $listeners = [
        'fileUpload'     => 'handleFileUpload',
    ];

    /**
     * handle file upload & check file type
     */
    public function handleFileUpload($file)
    {
        try {
            if($this->getFileInfo($file)["file_type"] == "image"){
                $this->image = $file;
            }else{
                session()->flash("error_image", "Uploaded file must be an image");
            }
        } catch (Exception  $ex) {
            
        }
    }

    /**
     * get file info
     */
    public function getFileInfo($file)
    {    
        $info = [
            "decoded_file" => NULL,
            "file_meta" => NULL,
            "file_mime_type" => NULL,
            "file_type" => NULL,
            "file_extension" => NULL,
        ];
        try{
            $info['decoded_file'] = base64_decode(substr($file, strpos($file, ',') + 1));
            $info['file_meta'] = explode(';', $file)[0];
            $info['file_mime_type'] = explode(':', $info['file_meta'])[1];
            $info['file_type'] = explode('/', $info['file_mime_type'])[0];
            $info['file_extension'] = explode('/', $info['file_mime_type'])[1];
        }catch(Exception $ex){

        }

        return $info;
    }

    /**
     * store image
     */
    public function storeImage()
    {
        $image   = ImageManagerStatic::make($this->image)->encode('png');
        $name  = Str::random() . '.png';
        Storage::disk('public')->put('avatar/'.$name, $image);
        return $name;
    }

    /**
     * store function
     */
    public function store()
    {
        $this->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|confirmed'
        ]);

        $user = User::create([
            'name'      => $this->name,
            'email'     => $this->email,
            'password'  => bcrypt($this->password),
            'image'     => $this->storeImage()
        ]);

        if($user) {

            session()->flash('success', 'Data saved successfully.');
            return redirect()->route('console.users.index');

        } else {

            session()->flash('error', 'Data failed to save.');
            return redirect()->route('console.users.index');

        }

    }

    public function render()
    {
        return view('livewire.console.users.create');
    }
}
