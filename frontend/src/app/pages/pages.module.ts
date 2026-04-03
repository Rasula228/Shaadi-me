import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { FormsModule } from '@angular/forms';

import { HomeComponent } from './home/home.component';
import { AboutComponent } from './about/about.component';
import { ContactComponent } from './contact/contact.component';
import { VenuesComponent } from './venues/venues.component';
import { WeddingsComponent } from './weddings/weddings.component';
import { ServicesComponent } from './services/services.component';
import { DestinationsComponent } from './destinations/destinations.component';
import { PressComponent } from './press/press.component';

@NgModule({
  declarations: [
    HomeComponent,
    AboutComponent,
    ContactComponent,
    VenuesComponent,
    WeddingsComponent,
    ServicesComponent,
    DestinationsComponent,
    PressComponent
  ],
  imports: [
    CommonModule,
    FormsModule,
    RouterModule
  ],
  exports: [
    HomeComponent,
    AboutComponent,
    ContactComponent,
    VenuesComponent,
    WeddingsComponent,
    ServicesComponent,
    DestinationsComponent,
    PressComponent
  ]
})
export class PagesModule { }
