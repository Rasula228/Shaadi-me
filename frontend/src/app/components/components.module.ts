import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { RouterModule } from '@angular/router';

import { NavbarComponent } from './navbar/navbar.component';
import { FooterComponent } from './footer/footer.component';
import { IntakeFormComponent } from './intake-form/intake-form.component';

@NgModule({
  declarations: [
    NavbarComponent,
    FooterComponent,
    IntakeFormComponent
  ],
  imports: [
    CommonModule,
    FormsModule,
    RouterModule
  ],
  exports: [
    NavbarComponent,
    FooterComponent,
    IntakeFormComponent
  ]
})
export class ComponentsModule { }
