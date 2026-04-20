import {
  AfterViewInit,
  Component,
  ElementRef,
  EventEmitter,
  Input,
  OnDestroy,
  Output,
  QueryList,
  ViewChildren
} from '@angular/core';
import { HeroSlide } from '../landing.types';

@Component({
  selector: 'app-hero',
  standalone: false,
  templateUrl: './hero.component.html',
  styleUrl: './hero.component.scss'
})
export class HeroComponent implements AfterViewInit, OnDestroy {
  @Input({ required: true }) slides: HeroSlide[] = [];
  @Output() startPlanning = new EventEmitter<void>();
  @ViewChildren('heroVideo') private videoElements!: QueryList<ElementRef<HTMLVideoElement>>;

  activeIndex = 0;
  private autoplayTimer: number | undefined;
  private syncFrame: number | undefined;

  ngAfterViewInit() {
    this.startAutoplay();
    this.scheduleVideoSync();
    this.videoElements.changes.subscribe(() => this.scheduleVideoSync());
  }

  ngOnDestroy() {
    if (this.autoplayTimer) {
      window.clearInterval(this.autoplayTimer);
    }

    if (this.syncFrame) {
      window.cancelAnimationFrame(this.syncFrame);
    }
  }

  selectSlide(index: number) {
    this.setActiveIndex(index);
    this.resetAutoplay();
  }

  scrollToThemes() {
    document.querySelector('#themes')?.scrollIntoView({ behavior: 'smooth' });
  }

  private startAutoplay() {
    if (!this.slides.length) {
      return;
    }

    this.autoplayTimer = window.setInterval(() => {
      this.setActiveIndex((this.activeIndex + 1) % this.slides.length);
    }, 7000);
  }

  private resetAutoplay() {
    if (this.autoplayTimer) {
      window.clearInterval(this.autoplayTimer);
    }
    this.startAutoplay();
  }

  private setActiveIndex(index: number) {
    this.activeIndex = index;
    this.scheduleVideoSync();
  }

  private syncVideos() {
    if (!this.videoElements) {
      return;
    }

    this.videoElements.forEach((videoRef, index) => {
      const video = videoRef.nativeElement;
      
      // Ensure all standard attributes are set
      video.muted = true;
      video.defaultMuted = true;
      video.playsInline = true;

      if (index === this.activeIndex) {
        // Simply attempt to play the active video. The browser handles buffering automatically.
        const playPromise = video.play();
        if (playPromise !== undefined) {
          playPromise.catch(() => {
            // Autoplay might be blocked or loading, ignore the error
          });
        }
      } else {
        video.pause();
      }
    });
  }

  private scheduleVideoSync() {
    if (this.syncFrame) {
      window.cancelAnimationFrame(this.syncFrame);
    }

    this.syncFrame = window.requestAnimationFrame(() => {
      this.syncVideos();
      this.syncFrame = undefined;
    });
  }
}
