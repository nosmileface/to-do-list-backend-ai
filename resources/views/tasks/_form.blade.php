<form method="POST" action="{{ $action }}" class="card max-w-3xl p-6 sm:p-9">
  @csrf
  @if($method !== 'POST') @method($method) @endif
  <div class="space-y-6">
    <div><label for="title" class="mb-2 block text-sm font-bold">Название задачи <span class="text-rose-500">*</span></label><input class="field @error('title') !border-rose-400 @enderror" id="title" name="title" type="text" required maxlength="255" value="{{ old('title', $task->title ?? '') }}" placeholder="Например, подготовить презентацию" aria-invalid="{{ $errors->has('title') ? 'true' : 'false' }}">@error('title')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror</div>
    <div><label for="description" class="mb-2 block text-sm font-bold">Описание</label><textarea class="field min-h-44 resize-y @error('description') !border-rose-400 @enderror" id="description" name="description" placeholder="Добавьте детали, чтобы ничего не забыть..." aria-invalid="{{ $errors->has('description') ? 'true' : 'false' }}">{{ old('description', $task->description ?? '') }}</textarea>@error('description')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror<p class="mt-2 text-xs text-slate-400">Необязательно, но полезно для сложных задач.</p></div>
  </div>
  <div class="mt-9 flex flex-wrap gap-3 border-t border-slate-100 pt-6"><button type="submit" class="btn btn-primary">{{ $submitText }}</button><a class="btn btn-soft" href="{{ route('tasks.index') }}">Отмена</a></div>
</form>
