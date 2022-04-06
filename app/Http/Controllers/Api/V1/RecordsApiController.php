<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\RecordStoreRequest;
use App\Http\Resources\RecordsCollection;
use App\Http\Resources\RecordsResource;
use App\Models\Record;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class RecordsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResource
     */
    public function index(): JsonResource
    {
        return new RecordsCollection(Record::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RecordStoreRequest $request
     * @return RecordsResource
     */
    public function store(RecordStoreRequest $request): RecordsResource
    {
        $record = Record::create($request->validated());

        return new RecordsResource($record);
    }

    /**
     * Display the specified resource.
     *
     * @param Record $record
     * @return JsonResource
     */
    public function show(Record $record): JsonResource
    {
        return new RecordsResource($record);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Record $record
     * @return JsonResponse | RecordsResource
     * @throws ValidationException
     */
    public function update(Request $request, Record $record): JsonResponse|RecordsResource
    {
        $credentials = $request->only('title', 'description');
        $validator = Validator::make($credentials, [
            'title' => 'string|max:255|min:2',
            'description' => 'string|min:3'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
        $record->update($validator->validated());

        return new RecordsResource($record);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Record $record
     * @return JsonResponse
     */
    public function destroy(Record $record): JsonResponse
    {
        $record->delete();

        return response()->json([
            'message' => 'Record was deleted',
        ]);
    }
}
