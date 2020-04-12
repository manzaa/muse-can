import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { ArtistComponent } from './artist/artist.component';
import { AlbumComponent } from './album/album.component';
import { SongComponent } from './song/song.component';

const routes: Routes = [
  { path: 'artist', component: ArtistComponent },
  { path: 'album', component: AlbumComponent },
  { path: 'song', component: SongComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
