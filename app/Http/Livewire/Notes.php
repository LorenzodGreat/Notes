<?php

namespace App\Http\Livewire;

use App\Models\Note;
use Livewire\Component;

class Notes extends Component
{
    public  $name, $email, $note, $edit_name, $edit_email, $edit_note, $edit_id;
    public $edit_mode = false;

    public function create_note()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://10.44.16.111:8080/api/note/create',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'name' => $this->name,
                'email' => $this->email,
                'note' => $this->note,
            )
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $this->resetinputs();
        return $response;
    }



    public function edit($id, $name, $email, $note)
    {
        $this->name = $name;
        $this->email = $email;
        $this->note = $note;
        $this->edit_id = $id;
        $this->edit_mode = true;
    }

    public function update()
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://10.44.16.111:8080/api/note/update',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'name' => $this->name,
                'email' => $this->email,
                'note_id' => $this->edit_id,
                'note' => $this->note
            ),
        ));

        $response = curl_exec($curl);
        $this->edit_mode = true;
        curl_close($curl);
        $this->resetinputs();
        $this->edit_mode = false;
        return $response;
    }

    public function delete_note($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://10.44.16.111:8080/api/note/delete/' . $id . '',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }
    public function get_notes()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://10.44.16.111:8080/api/note',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = json_decode(curl_exec($curl), true);

        curl_close($curl);
        return $response;
    }

    public function resetinputs()
    {
        $this->name = null;
        $this->email = null;
        $this->note = null;
    }

    public function render()
    {
        $All_Notes = $this->get_notes()['success'];
        return view('livewire.notes', ['notes' => $All_Notes]);
    }
}

   