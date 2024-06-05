<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;


class AdminController extends Controller
{
    public function showVideos()
    {
        $videos = Video::latest()->get();
        return view('videos.admin.indexadmin', compact('videos'));
    }

    public function applyRestrictions(Request $request)
    {
        // Получаем id видеоролика и выбранный тип ограничения из запроса
        $videoId = $request->input('video_id');
        $restrictionType = $request->input('restriction');

        //  существует ли видеоролик с таким id
        $video = Video::find($videoId);

        if (!$video) {
            // Видеоролик не найден
            return redirect()->back()->with('error', 'Видеоролик не найден.');
        }

        // Применяем выбранное ограничение на видеоролик
        switch ($restrictionType) {
            case 'no_restrictions':
                $video->restriction = 'none';
                break;
            case 'violation':
                $video->restriction = 'violation';
                break;
            case 'shadow_ban':
                $video->restriction = 'shadow_ban';
                break;
            default:
                // Если не выбрано ограничение, возвращаем ошибку
                return redirect()->back()->with('error', 'Не выбран тип ограничения.');
        }

        // Сохраняем изменения в базе данных
        $video->save();

        // Возвращаем успешное сообщение
        return redirect()->back()->with('success', 'Ограничения на видеоролик успешно применены.');
    }
}
