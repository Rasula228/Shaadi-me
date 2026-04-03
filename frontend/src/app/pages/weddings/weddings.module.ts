import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { WeddingsComponent } from './weddings.component';

@NgModule({
  declarations: [
    WeddingsComponent
  ],
  imports: [
    CommonModule,
    RouterModule.forChild([
      { path: '', component: WeddingsComponent }
    ])
  ],
  exports: [
    WeddingsComponent
  ]
})
export class WeddingsModule { }
