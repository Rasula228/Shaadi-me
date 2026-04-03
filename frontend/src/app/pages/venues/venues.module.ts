import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { VenuesComponent } from './venues.component';

@NgModule({
  declarations: [
    VenuesComponent
  ],
  imports: [
    CommonModule,
    RouterModule.forChild([
      { path: '', component: VenuesComponent }
    ])
  ],
  exports: [
    VenuesComponent
  ]
})
export class VenuesModule { }
