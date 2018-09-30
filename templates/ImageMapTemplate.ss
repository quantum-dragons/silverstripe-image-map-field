<% if $Image && $ImageMapAreas %>
  <div class="process-map" v-in-viewport.once>
    <div class="process-map__viewport">
      <img src="$Image.URL" class="process-map__image" title="$Image.Title" />
      <% loop $ImageMapAreas %>
        <a
          class="process-map__area process-map__area--{$Shape}"
          href="$DisplayUrl"
          style="top: $Y%; left: $X%; width: $Width%; height: $Height%;"
          <% if not $UseInternalPage %>target="_blank"<% end_if %>
        >
        <span class="sr-only">Image map area - $ID</span>
      </a>
      <% end_loop %>
    </div>
  </div>
<% end_if %>
