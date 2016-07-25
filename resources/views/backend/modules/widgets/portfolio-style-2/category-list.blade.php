<div class="table-full-width table-checkbox-container" id="portfolioStyle2CategoryList">
    <table class="table table-checkbox">
        <tbody>

        @foreach($categories as $category)

            <tr>
                <td class="td-only-checkbox">
                    <label class="checkbox">
                        <span class="icons">
                            <span class="first-icon fa fa-square-o"></span>
                            <span class="second-icon fa fa-check-square-o"></span>
                        </span>
                        <input type="checkbox"
                               name="category_id[]"
                               value="{{ $category->id }}"
                               data-toggle="checkbox"
                                {{ (old('category_id') == $category->id || $category->item_id) ? 'checked' : '' }}
                        >
                    </label>
                </td>
                <td>
                    <span>{{ $category->display_name }}</span>
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>
</div>
