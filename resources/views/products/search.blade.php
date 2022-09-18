<div class="grid gap-12">
    <p class="text-2xl">Фильтр</p>
    <form action="/" method="GET">
        <div class="mb-4">
            <select class="custom-select custom-select-lg mb-3" name="category" required>
                <option disabled selected="selected">Выберите категорию</option>
                @foreach($categories as $categorie)
                    <option {{ $categorie == $selected ? 'selected' : ''   }}>{{ $categorie }}</option>
                @endforeach
            </select>
        </div>
        <div style="height: 200px;overflow: auto;" class="mb-4">
            <p class="text-2xl">Город:</p>
            @foreach($cities as $key => $city)
                <div class="form-check">
                    <label></label><input class="form-check-input" name="city[]" type="checkbox" value="{{ $city }}"
                                          id="{{ $key }}"
                    @if (is_array($checked))
                        {{ in_array($city, $checked) ? 'checked' : '' }}
                        @else
                        {{ $city == $checked ? 'checked' : '' }}
                        @endif
                    >{{ $city }}
                    </label>
                </div>
            @endforeach
        </div>
        <div class="mb-4">
            <input type="submit">
        </div>
    </form>
</div>
