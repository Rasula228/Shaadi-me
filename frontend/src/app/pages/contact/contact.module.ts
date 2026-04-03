import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { RouterModule } from '@angular/router';
import { ContactComponent } from './contact.component';
import { ContactService } from '../../services/contact.service';

@NgModule({
  declarations: [
    ContactComponent
  ],
  imports: [
    CommonModule,
    FormsModule,
    RouterModule.forChild([
      { path: '', component: ContactComponent }
    ])
  ],
  exports: [
    ContactComponent
  ],
  providers: [
    ContactService
  ]
})
export class ContactModule { }
