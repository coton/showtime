<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Artwork;

use App\Models\Statistic;

class ArtWorkController extends BaseController
{

    // artwork attribute
    private $artworkName;
    private $artworkMD5;
    private $artworkURL;
    private $artworkIsExists = true;
    

    /**
     * add artwork
     *
     * @return mixed
     */
    public function add()
    {
        if($this->upload())
        {
            $artwork = new Artwork;
            $artwork->md5 = $this->artworkMD5;
            $artwork->name = $this->artworkName;
            $artwork->url = $this->artworkURL;
            $artwork->ip = $this->request->getClientIp();
            $artwork->artist_id = "";
            $artwork->save();

            return response()->json(['code' => 1, 'url' => $this->artworkURL, 'qrurl' => url('/artwork', ['id' => $this->artworkMD5])]);
        }else
        {
            if($this->artworkIsExists)
                return response()->json(['code' => 9, 'error' => 'File already exist!', 'qrurl' => url('/artwork', ['id' => $this->artworkMD5])]);

            return response()->json(['code' => 0, 'error' => 'upload fail!']);
        }
    }

    /**
     * upload file to "public\uploads dir"
     *
     * @return bool|\Symfony\Component\HttpFoundation\File\File
     */
    private function upload()
    {
        if ($this->request->hasFile('file') && $this->request->file('file')->isValid()) {

            $file = $this->request->file('file');

            $this->artworkMD5 = md5_file($file);

            if(!$this->checkFileIsExists($this->artworkMD5))
            {
                $this->artworkIsExists = false;

                $destPath = realpath(public_path('uploads'));
                if(!file_exists($destPath))
                    mkdir($destPath, 0755, true);

                $this->artworkName = $file->getClientOriginalName();
                $filename = $this->artworkMD5.".".$file->extension();

                $this->artworkURL = asset("uploads/".$filename);

                return $file->move($destPath, $filename);

            }
        }

        return false;
    }

    private function checkFileIsExists($artwork_md5)
    {
        return Artwork::where('md5', $artwork_md5)->first() !== null ? true : false;
    }

    /**
     * show artwork by artwork_md5
     *
     * @param $artwork_md5
     * @return mixed
     */
    public function show($artwork_md5)
    {
        $artwork = Artwork::where('md5', $artwork_md5)->first();

        if($artwork != null) {

            $likecount = $this->getLikeCountByArtwork($artwork_md5);

            $this->addPVByArtwork($artwork->md5);

            $wechat = app('wechat');

            return view('artwork', ['artwork' => $artwork, 'likecount' => $likecount, 'js'=>$wechat->js]);
        }else
        {
            return redirect("/");
        }
    }

    /**
     * add pv by $artwork_md5
     *
     * @param $artworkid
     */
    private function addPVByArtwork($artwork_md5)
    {

        $statistic = new Statistic();
        $statistic->artwork_md5 = $artwork_md5;
        $statistic->type = 'pv';
        $statistic->ip = $this->request->getClientIp();

        $statistic->save();
    }

    /**
     * get like count by Artwork
     *
     * @param $artwork_md5
     */
    private function getLikeCountByArtwork($artwork_md5)
    {
        return Statistic::where('artwork_md5', $artwork_md5)->where('type', 'like')->count();
    }

    /**
     * add pv by artwork_id
     *
     * @param $artworkid
     */
    public function addLikeByArtworkMD5($artwork_md5)
    {

        $statistic = new Statistic();
        $statistic->artwork_md5 = $artwork_md5;
        $statistic->type = 'like';
        $statistic->ip = $this->request->getClientIp();

        if($statistic->save())
            return response()->json(['code' => '1', 'success' => 'success']);
        else
            return response()->json(['code' => '0', 'error' => 'error']);

    }

    /**
     * artowk list
     *
     * @return mixed
     */
    public function all()
    {
        $artworks = Artwork::paginate(20);

        return view('artworklist', ['artworks'=>$artworks]);
    }
}
