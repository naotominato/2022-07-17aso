<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(Request $request)
    {
        $this->validate($request, contact::$rules);
        $contact = $request->all();
        return view('confirm', compact('contact'));
    }

    public function complete(Request $request)
    {
        if ($request->get('back')) {
            return redirect('/contact')->withInput();
        } elseif ($request->get('complete')) {
            $this->validate($request, contact::$rules);

            $family_name = $request->input('family_name');
            $first_name = $request->input('first_name');
            $fullname = $family_name . ' ' . $first_name;

            $gender = $request->input('gender');
            if ($gender == "男性") {
                $gender = 1;
            } elseif ($gender == "女性") {
                $gender = 2;
            };

            $contact = new contact();

            $contact->fill([
                'fullname' => $fullname,
                'gender' => $gender,
            ]);
            $contact->fill($request->only([
                'email',
                'postcode',
                'address',
                'building_name',
                'opinion',
            ]));
            unset($contact['_token']);
            $contact->save();
            return view('complete');
        };
    }



    public function search(Request $request)
    {
        $name = $request->input('name');
        $gender = $request->input('gender');
        $from = $request->input('from');
        $until = $request->input('until');
        $email = $request->input('email');

        $query = contact::query();

        if (!empty($name)) {
            $query->where('fullname', 'LIKE BINARY', "%{$name}%")->get();
        }

        if (!empty($gender)) {
            $query->where('gender', 'LIKE BINARY', "%{$gender}%")->get();
            if ($gender === 1) {
                $gender = "男性";
            } elseif ($gender === 2) {
                $gender = "女性";
            };
        }

        if (!empty($from) && !empty($until)) {
            $query->whereDate('created_at', '>=', $from)
                ->whereDate('created_at', '<=', $until)->get();
        }

        if (!empty($email)) {
            $query->where('email', 'LIKE BINARY', "%{$email}%")->get();
        }

        $users = $query->paginate(10);

        $contact = contact::all();

        return view('search', compact('users', 'name', 'gender', 'from', 'until', 'email', 'contact'));
    }


    public function delete(Request $request)
    {
        contact::find($request->id)->delete();
        return redirect('search');
    }
}
