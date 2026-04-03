import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { HttpClientModule } from '@angular/common/http';
import { RouterModule } from '@angular/router';

import { AppComponent } from './app';
import { routes } from './app.routes';
import { PagesModule } from './pages/pages.module';
import { ComponentsModule } from './components/components.module';

import { LeadService } from './services/lead.service';
import { ContactService } from './services/contact.service';

@NgModule({
  declarations: [
    AppComponent
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    RouterModule.forRoot(routes),
    PagesModule,
    ComponentsModule
  ],
  providers: [
    LeadService,
    ContactService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
