<% if $Image %>
  <div class="image-map-field-wrapper">
    <div class="image-map-field">
        <image-mapper
          src="$Image.URL"
          name="$Name"
          :default-areas-data="<% if $Value %>$Value<% else %>[]<% end_if %>"
          v-on:area-change="handleChange"
        >
          <template slot="tree-field">
            $TreeField
          </template>
        </image-mapper>
    </div>
  </div>
<% end_if %>
