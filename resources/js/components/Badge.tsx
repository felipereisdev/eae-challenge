import React from 'react';

interface BadgeProps {
  customClasses?: string;
  title: string;
}

export function Badge({ title, customClasses }: BadgeProps) {
  return (
    <span
      className={`rounded-3xl px-2 text-xs font-bold text-white flex items-center ${customClasses}`}
    >
      {title}
    </span>
  );
}
